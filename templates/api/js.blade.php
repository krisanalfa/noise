@if ($minify)
    $.ajax({type:"POST",url:'{{ URL::site("/api/widget") }}',data:{shared_key:window.NOISE_SHARED_KEY,shortname:window.NOISE_SHORT_NAME,uri:window.location.href,name:$($("title")[0]).text(),content:$('meta[name="description"]').attr("content")}}).success(function(t){var e=t.thread_id,i=$("<iframe />").attr("src",'{{ URL::site("/api/html") }}/'+e);i.attr("style","width: 100% !important; border: none !important; overflow: hidden !important; height: 272px !important;"),i.appendTo("#noise-root")}).fail(function(t){console.log(t)});
@else
    $.ajax({
        type: 'POST',
        url: '{{ URL::site("/api/widget") }}',
        data: {
            'shared_key' : window.NOISE_SHARED_KEY,
            'shortname' : window.NOISE_SHORT_NAME,
            'uri' : window.location.href,
            'name': $($('title')[0]).text(),
            'content': $('meta[name="description"]').attr('content'),
        },
    })
    .success(function(data) {
        var threadId = data.thread_id,
            iframe = $('<iframe />').attr('src', '{{ URL::site("/api/html") }}'+'/'+threadId);

        iframe.attr('style', 'width: 100% !important; border: none !important; overflow: hidden !important; height: auto !important;');
        iframe.appendTo('#noise-root');
    })
    .fail(function(err) {
        console.log(err);
    });
@endif


