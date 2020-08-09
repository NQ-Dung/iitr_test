<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('button.show').click(function() {
        $.ajax({
                url: 'getList',
                type: 'GET',
            }).done(function(result) {
                console.log(result);
                Object.entries(result).forEach(function(item) {
                    var html = '';
                    html += '<hX>'  + item[0] + '</hX>';
                    html += '<ul>';
                    for (let i=0; i < item[1].length; i++) {
                        html += '<li>' + item[1][i] + '</li>'
                    }
                    html += '</ul>';
                    $('div.car-list').append(html)
                })
                $('button.show').hide();
                $('button.hide').show();
            });
    })
    $('button.hide').click(function() {
        $('div.car-list').empty();
        $('button.show').show();
        $('button.hide').hide();
    })
});
</script>
</head>
{{ Form::button('Show car list', ['class' => 'show']) }}
{{ Form::button('Hide car list', ['class' => 'hide', 'hidden' => true]) }}
<div class="car-list">
<div>