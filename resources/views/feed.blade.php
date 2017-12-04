
<feed xmlns="http://www.w3.org/2005/Atom">

  <title>{{config('app.name')}} | Science meets Society</title>
  <link href="{{url()->full()}}"/>
  <updated>{{Carbon\Carbon::now()}}</updated>

@foreach ($tags as $tag)
  <category term="{{$tag->name}}"/>
@endforeach

  <id>{{config('app.url')}}</id>
  <logo>{{asset('/images/logo.svg')}}</logo>
  <icon>{{asset('/images/logo-small.svg')}}</icon>
  <rights>© TheScienceBreaker 2015 - {{Carbon\Carbon::now()->format('Y')}}. All rights reserved</rights>

@foreach($articles as $article)
  <entry>
    <title>{{$article->title}}</title>
    <link href="{{ config('app.url').$article->paths()->route()}}"/>
    <id>{{$article->doi}}</id>
    <updated>{{$article->updated_at}}</updated>
    <summary>{{$article->description}}</summary>
    <content>{{$article->resources()->preview()}}</content>
    <category term="{{$article->resources()->tagsList()}}"/>
    <published>{{$article->created_at}}</published>

    @foreach ($article->authors as $author)
      <author>
        <name>{{$author->resources()->fullName()}}</name>
      </author>
    @endforeach
  
  </entry>
@endforeach

</feed>