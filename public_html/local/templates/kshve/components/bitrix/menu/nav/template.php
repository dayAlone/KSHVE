<ul <?if($_COOKIE['nav_position']):?>style="top:<?=$_COOKIE['nav_position']?>px"<?endif;?>>
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (!empty($arResult)):
	foreach($arResult as $arItem):
		?>
		<li><a href="<?=$arItem['LINK']?>" class="<?=($arItem['SELECTED']?'active':'')?>"><?=$arItem['TEXT']?></a></li>
        <?
	endforeach;
endif?>
</ul>