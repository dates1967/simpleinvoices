function chain_select(si_product, target, attr, row_number, quantity)
{
    $('#gmail_loading').show();

        settings = jQuery.extend(
        {
            after : null,
            before : null,
            usePost : false,
            defaultValue : null,
            parameters : {'_id' : $(this).attr('id'), '_name' : $(this).attr('name')}
        });

    $.ajax({
        type: 'GET',
        url: './index.php?module=invoices&view=ajax&id='+si_product,
        data: "_value="+si_product,
        success: function(data){
            $('#gmail_loading').hide();
            /*$('#state').html(data);*/
            /*if ( (quantity.length==0) || (quantity.value==null) ) */
        settings = jQuery.extend(
        {
            after : null,
            before : null,
            usePost : false,
            defaultValue : null,
            parameters : {'_id' : $(this).attr('id'), '_name' : $(this).attr('name')}
        } , settings);

        settings.parameters._value =  $(this).val();

            $(target).html("");//clear old options
            data = eval(data);//get json array
            for (i = 0; i < data.length; i++)//iterate over all options
            {
              for ( key in data[i] )//get key => value
              {
                    $(target).get(0).add(new Option(data[i][key],[key]), document.all ? i : null);
              }
            }

                $("option:first", target).attr( "selected", "selected" );//select first option
          if (settings.after != null)
            {
                settings.after(target);
            }

            if (quantity=="")
            {
                $("#quantity"+row_number).attr("value","1");
            }
            $("#attr1"+row_number).attr("value",data);
            $(target).removeAttr('disabled');
        }
    });
}
jQuery.fn.chainSelect = function( target, url, settings ) 
{
  return this.each( function()
  {
    $(this).change( function( ) 
    {
        settings = jQuery.extend(
        {
            after : null,
            before : null,
            usePost : false,
            defaultValue : null,
            parameters : {'_id' : $(this).attr('id'), '_name' : $(this).attr('name')}
        } , settings);

        settings.parameters._value =  $(this).val();

        if (settings.before != null) 
        {
            settings.before( target );
        }

        ajaxCallback = function(data, textStatus) 
        {
            $(target).html("");//clear old options
            data = eval(data);//get json array
            for (i = 0; i < data.length; i++)//iterate over all options
            {
              for ( key in data[i] )//get key => value
              { 
                    $(target).get(0).add(new Option(data[i][key],[key]), document.all ? i : null);
              }
           }

            if (settings.defaultValue != null)
            {
                $(target).val(settings.defaultValue);//select default value
            } else
            {
                $("option:first", target).attr( "selected", "selected" );//select first option
            }

            if (settings.after != null) 
            {
                settings.after(target);
            }

            $(target).change();//call next chain
            $(target).removeAttr('disabled');

        };

        if (settings.usePost == true)
        {
            $.post( url, settings.parameters, ajaxCallback );
        } else
        {
            $.get( url, settings.parameters, ajaxCallback );
        }
    });
  });
};

