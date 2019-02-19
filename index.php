<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>

<?php // get_header( 'test' ) //template name: testBD?>

<?php
    // autocompletado del buscador
    error_reporting(0);
    global $wpdb;
    $registros1 = $wpdb->get_results($wpdb->prepare("SELECT nombre FROM wp_hostels"));
    $array = array();
    foreach ( $registros1 as $i => $page1 )
    {
      array_push($array, $page1);
    }
?>
<br><br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
      <form action="#" method="post">
        <!-- <div class="form-group">
          <input type="text" name="buscarHotel" class="form-control" id="tag" placeholder="Donde Estas?" >
        </div> -->

          <select class="selectpicker" data-live-search="true" name="buscarHotel">
          <?php
            global $wpdb;
            $registros3 = $wpdb->get_results($wpdb->prepare("SELECT campo FROM tabla"));
            foreach ( $registros3 as $i => $page )
            { ?>
                 <option data-tokens="<?php echo $page->id; ?>"><?php echo $page->nombre; ?></option>
            <?php } ?>
          </select>

        <input class="btn btn-primary" type="submit" value="buscar">
      </div>
      </form>
    </div>
</div>

<?php
    // para consulta del buscador
    error_reporting(0);
    global $wpdb;
    $registros = $wpdb->get_results($wpdb->prepare("SELECT * FROM tabla WHERE campo='$_POST[buscarHotel]'"));
    foreach ( $registros as $i => $page )
    {
        echo $page->nombre.'<br/>'; 
        echo $page->stops.'<br/>';  
        echo $page->mapa.'<br/>';
      }
?>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script>
    var options = {
        ajax          : {
            url     : '/ajax',
            type    : 'POST',
            dataType: 'json',
            data    : {
                q: '{{{q}}}'
            }
        },
        locale        : {
            emptyTitle: 'Select and Begin Typing'
        },
        log           : 3,
        preprocessData: function (data) {
            var i, l = data.length, array = [];
            if (l) {
                for (i = 0; i < l; i++) {
                    array.push($.extend(true, data[i], {
                        text : data[i].Name,
                        value: data[i].Email,
                        data : {
                            subtext: data[i].Email
                        }
                    }));
                }
            }
            return array;
        }
    };
    $('.selectpicker').selectpicker().filter('.with-ajax').ajaxSelectPicker(options);
    $('select.after-init').append('<option value="neque.venenatis.lacus@neque.com" data-subtext="neque.venenatis.lacus@neque.com" selected="selected">Chancellor</option>').selectpicker('refresh');
    $('select').trigger('change');
</script>

