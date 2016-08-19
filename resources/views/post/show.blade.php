<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>
	<h1>{{ $post->title }}</h1>

	<div>
		{{ $post->body }}
	</div>

	<hr>

	<h3>Comments</h3>
	<ul>
		@foreach($post->comments as $comment)
			<li>
				<h3>{{ $comment->owner->name }} said...</h3>
				{{ $comment->body }}
				@include('comments.form', ['parentId' => $comment->id])
			</li>
		@endforeach
	</ul>

	<h3>Leave a reply</h3>
	@include('comments.form')
</body>
</html>