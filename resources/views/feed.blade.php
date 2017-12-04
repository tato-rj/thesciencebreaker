
<feed xmlns="http://www.w3.org/2005/Atom" version="1.0">

  <title>{{config('app.name')}} | Science meets Society</title>
  <meta name="description" content="For the democratization of scientific literature" />
  <meta property="og:title" content="{{ config('app.name') }} | Science Meets Society" />
  <meta property="og:description" content="For the democratization of scientific literature" />
  <meta property="og:image" content="{{asset('/images/logo.svg')}}" />
  <link rel="shortcut icon" href="{{ asset('images/favicon/favicon-32x32.png') }}" type="image/x-icon" />
  <link href="{{url()->full()}}"/>
  <updated>{{Carbon\Carbon::now()}}</updated>

@foreach ($tags as $tag)
  <category term="{{$tag->name}}"/>
@endforeach

  <id><![CDATA[{{config('app.url')}}]]></id>
  <logo><![CDATA[{{asset('/images/logo.svg')}}]]></logo>
  <icon><![CDATA[{{asset('/images/logo-small.svg')}}]]></icon>
  <rights>© TheScienceBreaker 2015 - {{Carbon\Carbon::now()->format('Y')}}. All rights reserved</rights>

@foreach($articles as $article)
  <entry>
    <title>{{$article->title}}</title>
    <link href="{{ config('app.url').$article->paths()->route()}}"><![CDATA[ {{ config('app.url').$article->paths()->route()}} ]]></link>
    <guid>{{$article->doi}}</guid>
    <description>{{$article->description}}</description>
    <category term="{{$article->resources()->tagsList()}}">{{$article->category->name}}</category>
    <published>{{$article->created_at}}</published>

    @foreach ($article->authors as $author)
      <author>
        <name>{{$author->resources()->fullName()}}</name>
      </author>
    @endforeach
  
  </entry>
@endforeach

</feed>