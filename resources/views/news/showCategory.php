<h1>NEWS IN CATEGORY WITH ID <?= $id; ?> </h1>

<?php foreach ($category as $key => $news): ?>

<div style="border:1px solid">
    <h2><a href="<?=route('news.showNews', ['id' => $key]);?>"><?=$news['title'];?></a></h2>
    <p><?= $news['author']; ?> - <?= $news['created_at']->format('d-m-Y H:i'); ?></p>
    <p><?= $news['description']; ?></p>
</div>

<br><hr>

<?php endforeach; ?>

