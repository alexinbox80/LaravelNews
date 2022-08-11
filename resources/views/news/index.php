<h1>NEWS CATEGORIES</h1>
<?php foreach ($newsCategories as $key => $category): ?>

    <div style="border:1px solid">
        <h2><a href="<?=route('news.showCategory', ['id' => $key]);?>"><?=$category['title'];?></a></h2>
        <p><?=$category['created_at']->format('d-m-Y H:i');?></p>
        <p><?=$category['description'];?></p>
    </div><br><hr>

<?php endforeach;?>
