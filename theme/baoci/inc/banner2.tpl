<div id="Banner2">
    <img src="{$banner}" alt="description " />
    <div class="weizi"><div>您现在的位置：<a href="#">首页</a> &gt;
            <a href="{$cat_root.url}">{$cat_root.cat_name}</a> {if  $get_cat.two != $get_cat.root}&gt;<a
                href="{$cat_two.url}">{$cat_two.cat_name}</a>{if $get_cat.two != $get_cat.child && $get_cat.two != $get_cat.root} &gt; {$cat_child.cat_name}{/if}{/if}</div></div>

</div>