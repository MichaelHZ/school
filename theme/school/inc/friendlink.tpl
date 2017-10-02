<div id="friendlink">
    	<div class="center">
                    <h5>{$lang.link}：</h5>
                    <p>
					<!-- {foreach from=$link name=link item=link} -->
					<a href="{$link.link_url}" target="_blank" >{$link.link_name}</a><!-- {if !$smarty.foreach.link.last} -->|<!-- {/if} -->
                    <!-- {/foreach} -->
                    </p>
        </div>
	</div>