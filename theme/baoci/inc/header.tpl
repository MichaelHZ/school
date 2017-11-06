<header id="header">
    	<div class="center">
                <div id="logo">
                    <a href="#" > <img src="/images/{$_CFG.site_logo}" alt="description " /></a>
                </div>
                <!-- logo结束 -->
                <nav id="menu">
                            <ul>
                                <li {if $index.cur} class="hover"{/if}><a href="{$site.root_url}" >{$lang.home}</a></li>
                                <!-- {foreach from=$nav_middle_list name=nav_middle_list item=nav} -->
                                <li {if $nav.cur} class="hover"{/if} ><a href="{$nav.url}" {if $nav.target} target="_blank"{/if}>{$nav.nav_name}</a>
                                    {if $nav.child}
                                <ol>
                                    <!-- {foreach from=$nav.child name=nav_middle_list item=child} -->
                                    <li {if $child.cur} class="hover"{/if} ><a href="{$child.url}">{$child.nav_name}</a></li>
                                    <!-- {/foreach} -->

                                    <span class="arrow_bom"></span>
                                </ol>
                                    {/if}
                                </li>
                                <!-- {/foreach} -->

                            </ul>
        
                </nav>
                <!-- menu结束 -->
        </div>
    <span class="line"></span>
</header>