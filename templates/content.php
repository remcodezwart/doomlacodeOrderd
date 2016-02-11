<div class="container">
		<header>
		<section>
			<nav>
			 <?php echo getMenu($PageContent);?>
			</nav>
		</section>
		</header>
			<article>
			  <?php echo getContent($PageContent);?>
			</article>
			<aside>
			<?php echo getModule('contact') 
			?>
			</aside>