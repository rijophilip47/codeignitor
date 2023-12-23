<h2>Test Database</h2>

<?php if (!empty($news) && is_array($news)): ?>
    <?php foreach ($news as $news_item): ?>
        <h3><?= esc($news_item['title']) ?></h3>
        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
    <?php endforeach ?>
<?php else: ?>
    <p>No news found.</p>
<?php endif ?>