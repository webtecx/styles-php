<html>
<body>
<div>
  <p>content</p>
</div>

<?php Styles::begin(); ?>
p {
  color: #aaa;
}
<?php Styles::end(); ?>

<?php Script::begin(); ?>
  console.log('home');
<?php Script::end(); ?>
</body>
</html>
