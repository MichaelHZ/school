<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="pages">
   <!-- {if $pager.page gt 1} -->
  		 <a href="{$pager.previous}" id="btn_prev" class="change">{$lang.pager_previous}</a> 
   <!-- {else} -->
    <a href="javascript:void(0)"  id="btn_prev">
		{$lang.pager_previous}
	</a>
   		
   <!-- {/if} --> 
   <!-- {foreach from=$pager.cur_paper  item=v} --> 
   <a href="{$v.url}" {if $pager.page eq $v.index }class="change" {/if}>{$v.index}</a> 
   <!-- {/foreach} --> 
   <!-- {if $pager.page lt $pager.page_count} -->
   <a href="{$pager.next}" id="btn_next" class="change">{$lang.pager_next}</a>
   <!-- {else} -->
        <a href="javascript:void(0)" id="btn_next">
		{$lang.pager_next}
		</a>
		<!-- {/if} --> 
</div>