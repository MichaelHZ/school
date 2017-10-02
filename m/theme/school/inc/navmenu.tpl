<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="navmenu">
      
    	<h4><span></span><a href="{$cat_root.url}" style="color:#fff;">全部</a></h4>
	
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
 </div>
 
 