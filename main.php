<?php
/**
 * DokuWiki Default Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://dokuwiki.org/templates
 * @author Andreas Gohr <andi@splitbrain.org>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php echo strip_tags($conf['title'])?> – <?php tpl_pagetitle()?>
  </title>

  <?php tpl_metaheaders()?>
  <link href='/lib/tpl/meena/sorts_mill_goudy.css' rel='stylesheet' type='text/css'>
  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>
</head>

<body>
<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>
<div class="dokuwiki">
  <?php html_msgarea()?>

  <div class="stylehead">

    <div class="header">
      <div class="logo">
        <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[H]"')?>
      </div>

<!--<div class="subhead">Dozentin für Qigong Yangsheng<br /> Heilpraktikerin für Psychotherapie</div>
-->      <div class="clearer"></div>
    </div>

    <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html')?>
 </div>

  <?php flush()?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>
<div class="mainwrapper">
<div class="wrapper">
  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
  </div>
</div>


  <?php flush()?>
<div id="dw__sidebar">
    	<?php /* tpl_searchform() */?>
     <?php if($conf['breadcrumbs']){?>
    <div class="breadcrumbs sidebar__item">
      <?php tpl_breadcrumbs()?>
      <?php //tpl_youarehere() //(some people prefer this)?>
    </div>
    <?php }?>

    <?php if($conf['youarehere']){?>
    <div class="breadcrumbs sidebar__item">
      <?php tpl_youarehere() ?>
    </div>
    <?php }?>
<?php
/*    echo '<div id="index__tree">';
global $conf;
require_once DOKU_INC . 'inc/search.php';
    $data = array();
    search($data,$conf['datadir'],'search_index');
    echo html_buildlist($data,'idx','html_list_index','html_li_index');

    echo '</div>';
*/
global $lang;
$lang['btn_login'] = 'Seite ändern';
echo p_wiki_xhtml('seitenleiste', '', false);
if (isset($_SERVER['REMOTE_USER'])) {
    echo '<div class="secedit">';
global $lang;
$lang['btn_pageedit'] = 'Bearbeiten';
    echo html_btn('pageedit','seitenleiste','',
            array('do'      => 'edit'),
            'post', 'Seitenleiste');
    echo '</div>';
}
?>
</div>

  <div class="clearer">&nbsp;</div>
  <div class="stylefoot">
<?php if (isset($_SERVER['REMOTE_USER'])) { ?>
    <div class="meta">
      <div class="user">
        <?php tpl_userinfo()?>
      </div>
      <div class="doc">
        <?php tpl_pageinfo()?>
      </div>
    </div>
<?php } ?>

   <?php /*old includehook*/ @include(dirname(__FILE__).'/pagefooter.html')?>

    <div class="bar" id="bar__bottom">
      <div class="bar-left" id="bar__bottomleft">
<?php if (isset($_SERVER['REMOTE_USER'])) { ?>
        <?php tpl_button('edit')?>
        <?php tpl_button('history')?>
        <?php tpl_button('revert')?>
        <?php tpl_button('recent')?>
<?php } ?>
      </div>
      <div class="bar-right" id="bar__bottomright">
        <?php tpl_button('subscribe')?>
        <?php tpl_button('admin')?>
        <?php tpl_button('profile')?>
        <?php tpl_button('index')?>
        <?php tpl_button('login')?>
        <?php tpl_button('top')?>&nbsp;
      </div>
      <div class="clearer"></div>


  <?php tpl_license(false);?>

<?php /*old includehook*/ @include(dirname(__FILE__).'/footer.html')?>
<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
    </div>
  </div>
</div>
</div>
</body>
</html>
