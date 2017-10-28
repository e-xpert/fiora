(function() {
    $('#search').on('keyup', function() {
        if ($(this).val() == '') {
            $('.autocomplite').hide();
        } else {
            $('.autocomplite').show();
            $.post("php/search.php", {
                request: $(this).val()
            }, function(response) {
                var result = JSON.parse(response);
                $('.autocomplite ul li').detach();
                if (!result) {
                    $('.autocomplite ul').append('<li>По вашему запросу нечего не найдено</li>');
                } else {
                    result.forEach(function(element) {
                        var mark_percent = (element[3] != 0)
                            ? '<img src="images/mark_percent.png" alt="" />'
                            : '';
                        var mark_glass = (element[4] != 0)
                            ? '<img src="images/mark_glass.png" alt="" />'
                            : '';
                        $('.autocomplite ul').append('<li>' +
                            '<a href="product.php?art=' + element[0] + '" class="overlink"></a>' + '<div class="media">' + '<div class="media-left media-middle"><img class="img-circle" width="50" src="art_98/' + element[0] + '.jpg" alt="" /></div>' + '<div class="media-body media-middle">' + element[1] + '<div class="color_gray">' + element[2] + '</div>' + '<div class="color_gray">Арт.: ' + element[0] + '</div>' + '</div>' + '<div class="media-right media-middle">' + '<div class="nowrap">' + mark_percent + mark_glass + '</div>' + '</div>' + '</div>' + '</li>');
                    })
                }
            });
        }
    });

    var pathname = location.pathname;
    var hash = location.hash;

    if (pathname === '/catalog.php' && hash !== '') {
        var filter = 0;
        switch (hash) {
            case '#trand2017':
                filter_subcol(51);
                filter = 51;
                break;
            case '#Granity591':
                filter_subcol(51);
                filter = 51;
                break;
            case '#OneRose502':
                filter_subcol(25);
                filter = 25;
                break;
            case '#OneRose503':
                filter_subcol(34);
                filter = 34;
                break;
            case '#Oriety5714':
                filter_subcol(97);
                filter = 97;
                break;
            case '#Original501':
                filter_subcol(23);
                filter = 23;
                break;
            case '#Purity5012':
                filter_subcol(63);
                filter = 63;
                break;
            case '#Purity5217':
                filter_subcol(95);
                filter = 95;
                break;
            case '#Serene5723':
                filter_subcol(107);
                filter = 107;
                break;
            case '#Purity5729':
                filter_subcol(83);
                filter = 83
                break;
        }
        $('#filter_input_subcol_' + filter).closest('label').addClass('active');
        $('#filter_input_subcol_' + filter).closest('ul').addClass('open');
        $('#filter_input_subcol_' + filter).closest('ul').closest('li').children('label').addClass('active');
    }

    $('.show_phone').on('click', function(event) {
        event.preventDefault();
        $(this).next().show();
        $(this).hide();
    })

    // jQuery.validator.setDefaults({
    //     debug: true,
    //     success: 'valid'
    // });
    //
    // jQuery.validator.addMethod('name_ru', function(value, element) {
    //     return this.optional(element) || /[а-яёА-ЯЁ\d]/.test(value);
    // }, 'Допускаются только русские буквы.');
    //
    // $('#reg').validate({
    //     rules: {
    //         name: {
    //             required: true,
    //             name_ru: true
    //         },
    //         email: {
    //             required: true,
    //             email: true
    //         },
    //         phome: {
    //             required: true
    //         },
    //         code: {
    //             required: true,
    //             digits: true,
    //             minlength: 5,
    //             maxlength: 5
    //         }
    //     },
    //     errorClass: 'has-error',
    //     errorElement: "em"
    // });
    //
    // $('#login').validate({
    //     rules: {
    //         phome: {
    //             required: true
    //         },
    //         email: {
    //             required: true,
    //             email: true
    //         }
    //     }
    // });

    var surl = 'https://myfiora.com/?share=123';
    var title = 'Цветы в вазах | Fi`ora';
    var description = 'Долговечность живых цветов в герметичных вазах на долгие годы (от 5 лет). Сотни тысяч людей применили Fi’ora в своих интерьерах.';
    var image = 'https://myfiora.com/images/banner/image__post.jpg';

    Share = {
        vkontakte: function() {
            url = 'http://vkontakte.ru/share.php?';
            url += 'url=' + encodeURIComponent(surl);
            url += '&title=' + encodeURIComponent(description);
            // url += '&description=' + encodeURIComponent(description);
            // url += '&image=' + encodeURIComponent(image);
            // url += '&noparse=true';
            Share.popup(url);
        },
        odnoklassniki: function() {
            url = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
            url += '&st.comments=' + encodeURIComponent(description);
            url += '&st._surl=' + encodeURIComponent(surl);
            Share.popup(url);
        },
        facebook: function() {
            url = 'https://www.facebook.com/sharer.php?s=100';
            url += '&title=' + encodeURIComponent(title);
            url += '&description=' + encodeURIComponent(description);
            url += '&u=' + encodeURIComponent(surl);
            url += '&picture=' + encodeURIComponent(image);
            Share.popup(url);
        },

        popup: function(url) {
            window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
        }
    };

})();
