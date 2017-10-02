<header id="header" class="floatheader">
		<div id="logo">
			<a href="{$site.root_url}" ><img src="../images/{$site.site_logo}" alt="{$site.site_name}" title="{$site.site_name}" /></a>
		</div>
		<!-- logo结束 -->

		<nav id="menu">
			<ul>
				<li id="txt1" {if $index.cur} class="hover"{/if}><span></span><a href="{$site.root_url}" >{$lang.home}</a></li>
				 <!-- {foreach from=$nav_middle_list name=nav_middle_list item=nav} --> 
				<li id="txt{$nav.index}" {if $nav.cur} class="hover"{/if}><span></span><a href="{$nav.url}" {if $nav.target} target="_blank"{/if}>{$nav.nav_name}</a></li>
				<!-- {/foreach} -->
			</ul>
		</nav>
		<!-- menu结束 -->

		<span class="clear"></span>
		<!-- 清除浮动 -->
	</header>