<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserDetailsModel;

class Users extends BaseController
{
    public function register()
    {
        helper('form');

        return view('users/register', ['title' => 'User Registration']);

    }

    public function createUser()
    {
        helper('form');

        // Validation rules for user registration form
        $validationRules = [
            'email_id'         => 'required|valid_email|is_unique[users.email_id]',
            'user_name'        => 'required|min_length[3]|max_length[255]',
            'mobile_number'    => 'required|min_length[10]|max_length[15]',
            'password'         => 'required|min_length[6]',
            'confirm_password' => 'matches[password]',
        ];

        // Run validation
        if (! $this->validate($validationRules)) {
            // Validation fails, return to the registration form
            return $this->register();
        }

        // Validation passes, insert user data into the database
        $model = model(UserModel::class);

        // Ensure 'password' is a string before hashing
        $password = (string) $this->request->getPost('password');

        $userData = [
            'email_id'      => $this->request->getPost('email_id'),
            'user_name'     => $this->request->getPost('user_name'),
            'mobile_number' => $this->request->getPost('mobile_number'),
            'password'      => password_hash($password, PASSWORD_DEFAULT),
        ];

        $model->insert($userData);

        // Redirect to a success page
        return redirect()->to('/users/login')->with('error', 'User created succesfully');

    }


    public function login()
    {
        helper('form');

        return view('users/login', ['title' => 'User Login']);

    }

    public function processLogin()
    {
        $model = model(UserModel::class);

        // Validation rules for user login form
        $validationRules = [
            'user_name' => 'required',
            'password'  => 'required',
        ];

        // Run validation
        if (! $this->validate($validationRules)) {
            // Validation fails, return to the login form
            return redirect()->to('/users/login')->with('error', 'Validation failed');

        }

        // Validation passes, attempt to log in the user
        $user = $model->where('user_name', $this->request->getPost('user_name'))->first();

        $password = (string) $this->request->getPost('password');


        if ($user && password_verify($password, $user['password'])) {
            // Login successful, store user data in session
            $session = session();
            $session->set(['user_id' => $user['id']]);

            // Redirect to the user details form

            return redirect()->to('/users/userDetails');
        } else {
            // Login failed, display error and return to the login form
            return redirect()->to('/users/login')->with('error', 'Invalid username or password');

        }
    }

    public function userDetails()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->has('user_id')) {
            return redirect()->to('/users/login');
        }

        $model = new UserDetailsModel();

        // Check if user details already exist
        $userDetails = $model->where('user_id', $session->get('user_id'))->first();

        $data = [
            'title' => $userDetails ? 'Update User Details' : 'User Details',
            'userDetails' => $userDetails,
        ];
    
        return view('users/userDetails', $data);

    }

    public function saveDetails()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->has('user_id')) {
            return redirect()->to('/users/login');
        }

        helper('form');

        // Validation rules for user details form
        $validationRules = [
            'first_name'       => 'required',
            'last_name'        => 'required',
            'gender'           => 'required',
            'contact_number'   => 'required',
            'date_of_birth'    => 'required',
            'date_of_joining'  => 'required',
            'nationality'      => 'required',
        ];

        // Run validation
        if (! $this->validate($validationRules)) {
            // Validation fails, return to the user details form
            return redirect()->to('/users/userDetails')->with('error', 'Validation failed');

        }

        // Validation passes, insert user details into the database
        $model = model(UserDetailsModel::class);

        // Check if user details already exist
        $existingDetails = $model->where('user_id', $session->get('user_id'))->first();

        $userDetailsData = [
            'user_id'         => $session->get('user_id'),
            'first_name'      => $this->request->getPost('first_name'),
            'last_name'       => $this->request->getPost('last_name'),
            'gender'          => $this->request->getPost('gender'),
            'contact_number'  => $this->request->getPost('contact_number'),
            'date_of_birth'   => $this->request->getPost('date_of_birth'),
            'date_of_joining' => $this->request->getPost('date_of_joining'),
            'nationality'     => $this->request->getPost('nationality'),
        ];

        // $model->insert($userDetailsData);

        if ($existingDetails) {
            // Update user details if they already exist
            $model->update(['user_id' => $session->get('user_id')], $userDetailsData);
        } else {
            // Insert user details if they don't exist
            $model->insert($userDetailsData);
        }

        // Redirect or display success message
        return redirect()->to('/users/login')->with('success', 'User details saved successfully');
    }

    public function logout()
    {
        $session = session();

        // Destroy the session to log out the user
        $session->destroy();

        // Redirect to the login page
        return redirect()->to('/users/login');
    }

    public function userDetailsList()
    {
        $model = model(UserDetailsModel::class);
        $userDetailsList = $model->findAll(); // Fetch all user details

        $data = [
            'title' => 'User Details List',
            'userDetailsList' => $userDetailsList,
        ];

        return view('users/userDetailsList', $data);

    }

}
