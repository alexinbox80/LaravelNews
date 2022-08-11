<h1>NEWS WITH ID <?= $id;?></h1>
<div style="border:1px solid">
    <h2><?= $news['title']; ?></h2>
    <p><?= $news['author']; ?> - <?= $news['created_at']->format('d-m-Y H:i'); ?></p>
    <p><?= $news['description']; ?></p>
</div>
