{* 6.0.7-3-gce41f93 *}
<div class="listing_extra_cost">
	{foreach from=$choices item="choice" key="id"}
		<input type='radio' id='radio{$id}' name='c[subscription_choice]' value='{$choice.period_id}' {if $selected == $choice.period_id}checked="checked" {/if}/>
		<label for='radio{$id}' class="main_text">
			{$choice.display_value}
		</label>
		{if !$allFree}
				<label for='radio{$id}' class="price">
					{$choice.amount|displayPrice}
				</label>
		{/if}
		<br />
	{/foreach}
</div>