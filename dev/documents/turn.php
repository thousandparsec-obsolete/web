<?php
  $title = "Turn Execution Order";
  include "../bits/start_page.inc";
  include "../bits/start_section.inc";
?>

<h2>Key</h2>
<ul>
	<li><b>Orders which can be issued.</b></li>
	<li><i>Extension for servers with order/result delivery.</i></li>
	<li><font color="#00aa00">Things which "happen".</font></li>
</ul>

<h2>Execution Order</h2>

<ol>
	<li><i>
	Order movement
	<p>All the orders are moved around space, some posibily reaching there destination.</p>
	</i></li>

	<li>
	<b>COMBAT</b>: Combat 1/Bombing
	<p>Combat orders are executed, first round.	Bombs away.</p>
	</li>

	<li>
	<b>MOVE</b>: Move 1
	<p>Move warp engine half a years worth.	Move gravity well drives to a new system. Do nothing to jump engines.</p>
	</li>

	<li>
	<b>TRACKING</b>: Tracking 1
	<p>All tracking orders recalculate course for new position of ships.</p>
	</li>

	<li>
	<b>MISC</b>: Mine Laying/Anchor Creation/Misc/Colinisation/Remote mining
	<p>Colinasation happens. Misc stuff.</p>
	</li>

	<li>
	<font color="#00aa00">Population Growth</font>
	<p>Population Growth/Reduction happens in this phase.</p>
	</li>

	<li>
	<font color="#00aa00">Mining</font>
	<p>Mining occurs in this phase.</p>
	</li>

	<li>
	<b>TRANSPORT_DROP</b>: Transport 1
	<p>All stuff is beamed down.</p>
	</li>

	<li>
	<b>BUILD</b>: Build 1
	<p>Execute build orders, everything is built as much as possible. Leftover goes into research</p>
	</li>

	<li>
	<b>TRANSPORT_PICKUP</b>: Transport 2
	<p>All stuff is beamed up</p>
	</li>

	<li>
	<b>MOVE</b>: Move 2
	<p>Move warp engines the rest of the years worth. Gravity well can move to another system. Jump drives engage.</p>
	</li>

	<li>
	<b>COMBAT</b>: Combat 2
	<p>Combat orders are executed again, second round.</p>
	</li>

	<li><i>
	Result are moved around
	<p>All results are moved around space, some posiblily reaching there destination.</p>
	</i></li>

</ol>



<?php
  include "../bits/end_section.inc";
  include "../bits/end_page.inc";
?>
