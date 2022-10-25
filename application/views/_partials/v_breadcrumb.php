<div class="col-sm-6">
	<ol class="breadcrumb float-sm-right">
		<?php foreach ($this->uri->segments as $segment) : ?>
			<?php
			$url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
			$is_active =  $url == $this->uri->uri_string;
			?>

			<li class="breadcrumb-item <?php echo $is_active ? 'active' : '' ?>">
				<?php if ($is_active) : ?>
					<?php echo strtoupper($segment) ?>
				<?php else : ?>
					<a href="<?php echo site_url($url) ?>"><?php echo strtoupper($segment) ?></a>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ol>
</div><!-- /.col -->