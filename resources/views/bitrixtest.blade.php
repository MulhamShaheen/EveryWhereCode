<?php
    $localContacts = [];
    function doApi(string $fun,?array $data=[]){
    $curl_handle = curl_init();
    $url_lead_list = "https://b24-oyugfz.bitrix24.ru/rest/1/ia2x1swkyjgdfw0j/".$fun;

    curl_setopt($curl_handle, CURLOPT_URL, $url_lead_list);

    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    if($data){
        $payload = json_encode($data);

        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $payload);

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    }
    $curl_lead_list = curl_exec($curl_handle);

    curl_close($curl_handle);

    $response = json_decode($curl_lead_list);
    return $response;
}

$list_leads = [];

?>

<?php
$start = 0;
while(true):

        $response_lead_list = doApi("crm.lead.list?start=".$start);
    if(isset($response_lead_list->result)){
        $list_leads = array_merge($list_leads,$response_lead_list->result);
    }
    else{
        print_r($response_lead_list);
        die();

    }

    if(isset($response_lead_list->next)):

        $start = $response_lead_list->next;

    else:
        break;
    endif;
 endwhile;
 ?>



<?php
    if(isset($_POST['newVal'])){

        $ass=doApi("crm.lead.update",[
            "id"=> $_POST['ID'],
            "fields"=>[
                $_POST['property']=>$_POST['newVal']
            ],
            "params"=>[
                "REGISTER_SONET_EVENT"=> "Y"
            ]
        ]);

    }
    if(isset($_POST['Generate'])){
        $i = 200;
        while($i>=0){
            doApi("crm.lead.add",[
                "fields"=>[
                    "TITLE"=>"Auto lead #".$i,
                    "NAME"=> "Глеб",
                    "SECOND_NAME"=> "Генераторов",
                    "LAST_NAME"=> "Генератор",
                    "STATUS_ID"=> "NEW",
                    "OPENED"=> "Y",
                    "ASSIGNED_BY_ID"=> 1,
                    "CURRENCY_ID"=> "RUB",
                    "OPPORTUNITY"=> $i * 100,
                ],

            ]);
            $i--;
        }
    }
    if(isset($_POST['Delete'])){

        $pattern = "/Auto lead #\d+/";
        foreach ($list_leads as $lead){
            if( preg_match($pattern, $lead->TITLE)){
                doApi("crm.lead.delete?id=".$lead->ID);
            }
        }
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaheen Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<script>
    let response = fetch("https://b24-oyugfz.bitrix24.ru/rest/1/ia2x1swkyjgdfw0j/crm.lead.list?start=0");
        let response1 = fetch("https://b24-oyugfz.bitrix24.ru/rest/1/ia2x1swkyjgdfw0j/crm.contact.get?id=1");
    console.log(response);

</script>
<style>
    body{
        padding: 20px;
        background: #333333;
    }
</style>
<body>

<div id="container" class="container">
    <div class="pb-2 text-white">
        <h2>Leads</h2>
    </div>
    <div class="container pl-5 pr-5 pt-2 ">
        <div class="row">
            <?php foreach ($list_leads as $lead):?>
                <div @mouseover="mouseOver(<?=$lead->ID?>)" @mouseout="mouseExit(<?=$lead->ID?>)"  id="lead-<?=$lead->ID?>"
                     class="col border text-white text-center position-relative">
                    <?=$lead->TITLE?><br>
                    <?php
                    if($lead->CONTACT_ID):
                    $response_contact = doApi("crm.contact.get?id=".$lead->CONTACT_ID);
                    $contact = $response_contact->result;
                    $localContacts[$lead->ID]=$contact;
                    ?>
                    Contact: <?=($contact->NAME." ".$contact->SECOND_NAME  );?><br>
                    <?php if($contact->HAS_PHONE == "Y"):?>
                    <?php foreach ($contact->PHONE as $phone):?>
                    <?=$phone->VALUE_TYPE?>: <?= $phone->VALUE?><br>
                    <?php endforeach;?>

                    <?php endif;?>
                    <?php else:
                    $localContacts[$lead->ID]='No information about contacts '; ?>
                    No information about contacts <br>
                    <?php endif;?>
                    Value: <?=$lead->OPPORTUNITY?> <?=$lead->CURRENCY_ID?>
                    <img v-on:click="openEditor(<?=$lead->ID?>)" id="pen-<?=$lead->ID?>" src="img\pen.svg" class="position-absolute top-0 start-0 m-1"
                         alt="" width="20px" hidden >

                    <div class="modal fade" id="modal-<?=$lead->ID?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container text-black-50 pb-3">
                                        <div class="row">
                                            <div class="col">
                                                ID
                                            </div>
                                            <div class="col">
                                                <?= $lead->ID?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Title
                                            </div>
                                            <div class="col">
                                                <?= $lead->TITLE?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                First Name
                                            </div>
                                            <div class="col">
                                                <?php if(!is_string($localContacts[strval($lead->ID)])):?>
                                                   <?=$localContacts[strval($lead->ID)]->NAME?>
                                               <?php else:?>
                                                ...
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Second Name
                                            </div>
                                            <div class="col">
                                                <?php if(!is_string($localContacts[strval($lead->ID)])):?>
                                                   <?=$localContacts[strval($lead->ID)]->SECOND_NAME?>
                                               <?php else:?>
                                                ...
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Phone
                                            </div>
                                            <div class="col">
                                                <?php if(!is_string($localContacts[strval($lead->ID)])):?>
                                                   <?=$localContacts[strval($lead->ID)]->PHONE[0]->VALUE?>
                                               <?php else:?>
                                                ...
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" text-black-50 d-flex justify-content-center">
                                        {{ Form::open(array('url' => 'bitrixtest')) }}
                                        <div class="input-group mb-3">
                                            <span class="input-group-text pr-3"><?= Form::label('property', 'Value to update');?></span>
                                            <?php
                                            echo Form::select('property',[
                                                'TITLE'=>'Title',
                                                'OPPORTUNITY'=>'Value',
                                            ]) ;
                                            echo Form::text('newVal', '');
                                            echo "<br>";
                                            echo Form::hidden('ID', $lead->ID);
                                            ?>
                                        </div>
                                        <?php
                                        echo Form::submit("Update");
                                        ?>

                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
        </div>
    </div>

</div>

<div class="container">
    <div class="pb-2 text-white">
        {{ Form::open(array('url' => 'bitrixtest')) }}
        <?php

            echo Form::hidden('Generate',true);
            echo Form::submit('Generate');

        ?>
        {{Form::close()}}

        {{ Form::open(array('url' => 'bitrixtest')) }}
        <?php

            echo Form::hidden('Delete',true);
            echo Form::submit('Delete Generated');

        ?>
        {{Form::close()}}
    </div>
</div>
    <script data-b24-form="inline/9/unuc3n" data-skip-moving="true">
        (function(w,d,u){
            var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b20004286/crm/form/loader_9.js');
    </script>
<script>
    var app = new Vue({
        el: '#container',
        data:{
            showEdit:false,
        },
        mounted() {
            console.log("111");
        },
        methods:{
            openEditor: function (id){
                var myForm = new bootstrap.Modal(document.getElementById('modal-'+id));
                console.log("event");
                myForm.show();
            },
            mouseOver: function (id){
                bla = document.getElementById("pen-"+id);
                bla.removeAttribute("hidden");
                console.log(bla);
            },
            mouseExit: function (id){
                bla = document.getElementById("pen-"+id);
                bla.setAttribute("hidden","hidden");
                console.log(bla);
            }
        }
    });

</script>

</body>
<script src="{{ asset('/js/app.js') }}">

</script>

</html>
