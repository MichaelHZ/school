<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<a href="#" class="btn_menu"><i class="icon_menu"></i></a>
<nav id="menu">
    <ul>
        <li><a href="/">学校首页</a></li>

        <ul>
            <!-- {foreach from=$article_category item=cate} 一级分类 -->
            <li> <a href="{if $cate.child}#{else}{if $cate.custom_url}{$cate.custom_url}?cat_id={$cate.cat_id}{else}{$cate.url}{/if}{/if}" {if $cate.cur}class="cur"{/if}>{$cate.cat_name}</a>
                {if $cate.child}
                    <ol>
                        <!-- {foreach from=$cate.child item=subcate} 二级分类 -->
                        <li><a href="{if $subcate.custom_url}{$subcate.custom_url}?cat_id={$subcate.cat_id}{else}{$subcate.url}{/if}">{$subcate.cat_name}</a></li>
                        <!--{/foreach}-->
                    </ol>
                {/if}
            </li>
            <!--{/foreach}-->
        </ul>
    </ul>

</nav>