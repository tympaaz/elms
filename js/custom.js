$(document).ready(function(e) {


    $('#elms-filter-select-source').each(function() {
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function() {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });


    setInterval(ajaxcall, 1000);

    $('#elms-filter-submit').click(function() {
        var date = $('#elms-filter-date-from').val();
        var dateto = $('#elms-filter-date-to').val();
        var source = $('#elms-filter-select-source').val();

        if (dateto < date) {
            alert('2nd date picker must be greater than 1st one.')
        } else {
            //              $('#myVariable').datepicker({dateFormat: 'dd/mm/yy'});
            var date = $('#elms-filter-date-from').val();
            var dateto = $('#elms-filter-date-to').val();

            $.ajax({
                url: "http://localhost/elms/ajax.php/",
                type: 'POST',
                data: ({ date: date, dateto: dateto, source: source }),
                success: function(data) {
                    obj = jQuery.parseJSON(data);
                    $('.sub-title').html(source);
                    $('#new').html(obj.length);
                    $('#filter').empty();

                    $('#filter').append('<tr><th class="no-text"></th><th class="center">S.No</th><th>Name</th><th>Email Address</th><th>Phone Number</th><th>Interested Country</th><th>Message</th><th class="no-text"></th></tr>');
                    var counter = 0;
                    $.each(obj, (function(res, k) {
                        $('#filter').append('<tr><td class="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="' + k.id + '"/></td><td class="center" value="' + k.id + '">' + (++counter) + "<span class='enq-id'>" + k.id + "</span>" + '</td><td value="' + k.name + '">' + k.name + '</td><td value="' + k.email + '">' + k.email + '</td><td value="' + k.phone + '">' + k.phone + '</td><td value="' + k.interested_country + '">' + k.interested_country + '</td><td value="' + k.message + '">' + k.message + '</td><td><a href="delete.php?id=' + k.id + '"class="fa fa-trash"></a></td></tr>')

                    }));
                }
            })
        }
    })
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });


    function ajaxcall() {
        $.ajax({
            url: 'date.php',
            success: function(data) {
                data = data.split(':');
                $('#hours').html(data[0]);
                $('#minutes').html(data[1]);
                //             $('#seconds').html(data[2]);
            }
        });
    }


});