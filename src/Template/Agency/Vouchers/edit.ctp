<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Voucher $voucher
 */
echo $this->Html->script('/backend/libs/jquery-ui/jquery-ui.min', ['block' => 'scriptBottom']);
?>
<?= $this->Form->create($voucher, ['class' => 'form-horizontal form-label-left', 'data-parsley-validate', 'type' => 'file']) ?>
<?php
$this->Form->setTemplates([
    'formStart' => '<form class="" {{attrs}}>',
    'label' => '<label class="control-label col-md-3 col-sm-3 col-xs-12" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-md-9 col-sm-9 col-xs-12"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
    'select' => '<div class="col-md-9 col-sm-9 col-xs-12"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
    'textarea' => '<div class="col-md-9 col-sm-9 col-xs-12"><textarea name="{{name}}"{{attrs}}>{{content}}{{value}}</textarea></div>',
    'inputContainer' => '<div class="item form-group">{{content}}</div>',
    'inputContainerError' => '<div class="item form-group">{{content}}{{error}}</div>',
    'checkContainer' => ''
]);
?>
<h1>Thêm Combo</h1>
<div class="col-md-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chi tiết Combo</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />            
            <?php
            echo $this->Form->control('name', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Tên Combo *',
                'required' => 'required'
            ]);
            echo $this->Form->control('departure_id', [
                'options' => $departures,
                'class' => 'form-control select2',
                'label' => 'Điểm đi *',
                'required' => 'required'
            ]);
            echo $this->Form->control('destination_id', [
                'options' => $destinations,
                'class' => 'form-control select2',
                'label' => 'Điểm đến *',
                'required' => 'required'
            ]);
            ?>            

            <div class="control-group">
                <div class="controls">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Thời gian *</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input type="text" name="reservation" class="custom-daterange-picker form-control" value="" />
                            <div class="date-range-edit-value" data-start-date="<?= date('d/m/Y', strtotime($voucher->start_date)) ?>" data-end-date="<?= date('d/m/Y', strtotime($voucher->end_date)) ?>"></div>
                        </div>
                    </div>
                </div>
            </div>                        
            <div class="clearfix"></div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện *</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="thumbnail" />
                    <input name="thumbnail_edit" type="hidden" value='<?= $voucher->thumbnail ?>' />
                </div>
            </div>
            <?php if ($voucher->thumbnail): ?>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <?= $this->Html->image('/' . $voucher->thumbnail, ['alt' => 'thumbnail', 'class' => 'img-responsive']); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            echo $this->Form->control('description', [
                'type' => 'textarea',
                'class' => 'form-control tinymce',
                'label' => 'Nội dung Combo *',
                'required' => 'required'
            ]);
            ?>
            <div class="text-center">
                <label class="control-label">Danh sách Ảnh</label>
            </div>
            <div id="dropzone-upload" class="dropzone">
            </div>
            <input type="hidden" name="media" value='<?= $voucher->media ?>'/>
            <input type="hidden" name="list_image" value='<?= $list_images ?>'/>
            <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success" id="blog-submit">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Mô tả ngắn</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a class="btn btn-success" onclick="addCaption(this, '.list-caption')"><i class="fa fa-plus"></i> Thêm Mô tả ngắn <i class="fa fa-spinner fa-spin hidden"></i></a>
            <div class="list-caption">
                <?php if ($voucher->caption): ?>
                    <?php $captions = json_decode($voucher->caption, true); ?>
                    <?php foreach ($captions as $caption): ?>                
                        <div class="caption-combo-item">
                            <hr />
                            <div class="row">
                                <div class="col-sm-10 col-xs-10">
                                    <?php
                                    echo $this->Form->control('list_caption[]', [
                                        'templates' => [
                                            'inputContainer' => '<div class="item form-group">{{content}}</div>',
                                            'label' => '<label class="control-label col-md-2 col-sm-2 col-xs-12" {{attrs}}>{{text}}</label>',
                                            'input' => '<div class="col-md-10 col-sm-10 col-xs-12"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
                                        ],
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'label' => 'Mô tả *',
                                        'required' => 'required',
                                        'default' => $caption
                                    ]);
                                    ?>
                                </div>
                                <div class="col-sm-2 col-sm-2 text-right">
                                    <a href="#" onclick="deleteItem(this, '.caption-combo-item');" class="mt10">
                                        <i class="text-danger fa fa-minus" ></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Chi tiết Combo</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />  
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Đánh giá</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='starrr-existing' data-rating="<?= $voucher->rating ?>"></div>
                    <input type="hidden" name="rating" value="<?= $voucher->rating ?>" />
                </div>
            </div>
            <?php
            echo $this->Form->control('price', [
                'type' => 'text',
                'class' => 'form-control currency',
                'label' => 'Giá *',
                'required' => 'required',
            ]);
            echo $this->Form->control('trippal_price', [
                'type' => 'text',
                'class' => 'form-control currency',
                'label' => 'Giá Cộng tác viên *',
                'required' => 'required',
            ]);
            echo $this->Form->control('customer_price', [
                'type' => 'text',
                'class' => 'form-control currency',
                'label' => 'Giá cho Khách hàng *',
                'required' => 'required',
            ]);
            echo $this->Form->control('promote', [
                'type' => 'text',
                'class' => 'form-control currency',
                'label' => 'Khuyến mại'
            ]);
            ?> 
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Chọn Phòng Khách sạn</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a class="btn btn-success" onclick="addRoom(this, '.list-room-by-hotel')"><i class="fa fa-plus"></i> Thêm Phòng Khách sạn <i class="fa fa-spinner fa-spin hidden"></i></a>
            <input type="hidden" name="list_hotel" />
            <br />  
            <div class="list-room-by-hotel">
                <?php foreach ($voucher->rooms as $room): ?>
                    <div class="combo-room-item">
                        <hr />
                        <div class="row">
                            <div class="col-sm-5 col-xs-12">
                                <?php
                                echo $this->Form->control('hotel[]', [
                                    'templates' => [
                                        'inputContainer' => '<div class="item form-group">{{content}}</div>',
                                        'label' => '<label class="control-label col-md-4 col-sm-4 col-xs-12" {{attrs}}>{{text}}</label>',
                                        'select' => '<div class="col-md-8 col-sm-8 col-xs-12"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
                                    ],
                                    'options' => $hotels,
                                    'empty' => 'Chọn khách sạn',
                                    'class' => 'form-control select2 gen-room-by-hotel',
                                    'required' => 'required',
                                    'label' => 'Khách sạn *',
                                    'data-room-id' => $room->id,
                                    'default' => $room->hotel->id,
                                    'onchange' => 'getRoomByHotel(this)'
                                ]);
                                ?>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                <div class="room-by-hotel">

                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a href="#" onclick="deleteItem(this, '.combo-room-item');" class="mt10">
                                    <i class="text-danger fa fa-minus" ></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>