<!doctype html>
<html>
<head>
<title><?php echo $title; ?></title>
<?php load_template('inc/cdn'); ?>
</head>
<body>
<div class="m-page">
  <div data-am-widget="header" class="am-header am-header-default m-header">
    <div class="am-header-left am-header-nav"><a href="/"><i class="am-header-icon am-icon-home"></i></a></div>
    <div class="am-header-title">九号 <small>代购</small></div>
  </div>

  <div>
  <?php echo $item; ?>
  </div>
</div>
</body>
</html>