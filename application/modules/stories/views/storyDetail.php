<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">

	<div class="col-sm-9">

		<div class="well padding-10">

			<div class="row">
				
				<div class="col-md-12 padding-left-0">
					<h3 class="margin-top-0"><a href="javascript:void(0);"><?php echo $story['title']; ?></a><br><small class="font-xs"><i>AuthorBy by <a href="javascript:void(0);"><?php echo $story['authorBy']; ?></a></i></small></h3>
					<div class="row">
						<div class="col-md-12">
					<img src="<?php echo base_url().$story['featuredImage']; ?>" class="img-responsive" alt="img">
					<ul class="list-inline padding-10">
						<li>
							<i class="fa fa-calendar"></i>
							<a href="javascript:void(0);"><?php echo date('F d, Y',strtotime($story['storyDate'])) ?></a>
						</li> 
						<li>
							<i class="fa fa-comments"></i>
							<a href="javascript:void(0);"> 0 Comments </a>
						</li>
					</ul>
				</div>
					</div>
					<p>
						<?php echo $story['description']; ?>
						<br><br>
					</p>
					<!-- <a class="btn btn-primary" href="javascript:void(0);"> Read more </a> -->
					<a class="btn btn-warning" href="<?php echo base_url(); ?>stories/addStory/<?php echo encoding($story['storyId']); ?>"> Edit </a>
					<a class="btn btn-success" href="javascript:void(0);"> Publish </a>
				</div>
			</div>
			<hr>

		</div>

	</div>

	<div class="col-sm-3">
		<div class="well padding-10">
			<!-- <h5 class="margin-top-0"><i class="fa fa-search"></i> Blog Search...</h5>
			<div class="input-group">
				<input type="text" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<i class="fa fa-search"></i>
					</button> </span>
			</div> -->
			<!-- /input-group -->
		</div>
		<!-- /well -->
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-tags"></i> Popular Tags:</h5>
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled">
						<li>
							<a href=""><span class="badge badge-info">Windows 8</span></a>
						</li>
						<li>
							<a href=""><span class="badge badge-info">C#</span></a>
						</li>
						<li>
							<a href=""><span class="badge badge-info">Windows Forms</span></a>
						</li>
						<li>
							<a href=""><span class="badge badge-info">WPF</span></a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="list-unstyled">
						<li>
							<a href=""><span class="badge badge-info">Bootstrap</span></a>
						</li>
						<li>
							<a href=""><span class="badge badge-info">Joomla!</span></a>
						</li>
						<li>
							<a href=""><span class="badge badge-info">CMS</span></a>
						</li>
						<li>
							<a href=""><span class="badge badge-info">Java</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /well -->
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-thumbs-o-up"></i> Follow Us!</h5>
			<ul class="no-padding no-margin list-unstyled">
				<li>
					<p class="no-margin">
						<a title="Facebook" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a>
						<a title="Twitter" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a>
						<a title="Google+" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x"></i></span></a>
						<a title="Linkedin" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x"></i></span></a>
						<a title="GitHub" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-github fa-stack-1x"></i></span></a>
						<a title="Bitbucket" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-bitbucket fa-stack-1x"></i></span></a>
					</p>
				</li>
			</ul>
		</div>
		<!-- /well -->
		<!-- /well -->
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-fire"></i> Popular Posts:</h5>
			<ul class="no-padding list-unstyled">
				<li>
					<a href="javascript:void(0);" class="margin-top-0">WPF vs. Windows Forms-Which is better?</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="padding-top-5 display-block">How to create responsive website with Bootstrap?</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">The best Joomla! templates 2014</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">ASP .NET cms list</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">C# Hello, World! program</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">Java random generator</a>
				</li>
			</ul>
		</div>
		<!-- /well -->

		<!-- /well -->
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-video-camera"></i> Featured Videos:</h5>
			<div class="row">

				<div class="col-lg-12">

					<ul class="list-group no-margin">
						<li class="list-group-item">
							<a href=""> <span class="badge pull-right">15</span> Photograph </a>
						</li>
						<li class="list-group-item">
							<a href=""> <span class="badge pull-right">30</span> Life style </a>
						</li>
						<li class="list-group-item">
							<a href=""> <span class="badge pull-right">9</span> Food </a>
						</li>
						<li class="list-group-item">
							<a href=""> <span class="badge pull-right">4</span> Travel world </a>
						</li>
					</ul>

				</div>

				<div class="col-lg-12">
					<div class="margin-top-10">
					<!-- 	<iframe allowfullscreen="" frameborder="0" height="210" src="http://player.vimeo.com/video/87025094" width="100%"></iframe> -->
					</div>
				</div>
			</div>

		</div>
		<!-- /well -->

	</div>

</div>
