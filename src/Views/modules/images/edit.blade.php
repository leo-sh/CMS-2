@extends('cms::layouts.dashboard')

@section('content')

    <div class="row">
        <h1 class="page-header">Images</h1>
    </div>

    @include('cms::modules.images.breadcrumbs', ['location' => ['edit']])

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="thumbnail ">
                <img src="{!! $images->url !!}" />
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="raw-margin-top-0 raw-margin-bottom-24">Blade Tags</h2>
<pre>
 &#64;image({{ $images->id }})
 &#64;image_link({{ $images->id }})
@foreach(explode(',', $images->tags) as $tag) &#64;images({{ trim($tag) }})<br>@endforeach</pre>
            @if (!is_null($images->entity_id))
                <h2 class="raw-margin-top-24 raw-margin-bottom-8">Linked Entity</h2>
                <a href="{{ url(config('cms.backend-route-prefix', 'cms').'/'.$images->entity_type.'s/'.$images->entity_id.'/edit') }}">{{ ucfirst($images->entity_type) }}</a>
            @endif
        </div>
    </div>

    <div class="row">
        {!! Form::model($images, ['route' => [config('cms.backend-route-prefix', 'cms').'.images.update', $images->id], 'method' => 'patch', 'files' => true, 'class' => 'edit']) !!}

            {!! FormMaker::fromObject($images, Config::get('cms.forms.images-edit')) !!}

            <div class="form-group text-right">
                <a href="{!! url(config('cms.backend-route-prefix', 'cms').'/images') !!}" class="btn btn-secondary raw-left">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection
