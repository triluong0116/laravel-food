<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
echo $this->Html->script('/backend/libs/jquery-ui/jquery-ui.min', ['block' => 'scriptBottom']);
if ($this->request->getData()) {
    $dataValiError = $this->request->getData();
} else {
    $dataValiError = [];
}
?>
<?= $this->Form->create($room, ['class' => 'form-horizontal form-label-left', 'data-parsley-validate', 'type' => 'file']) ?>
<?php
$this->Form->setTemplates([
    'formStart' => '<form class="" {{attrs}}>',
    'label' => '<label class="control-label col-md-3 col-sm-3 col-xs-12" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-md-9 col-sm-9 col-xs-12"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
    'select' => '<div class="col-md-9 col-sm-9 col-xs-12"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
    'textarea' => '<div class="col-md-9 col-sm-9 col-xs-12"><textarea name="{{name}}"{{attrs}}>{{content}}</textarea></div>',
    'inputContainer' => '<div class="item form-group">{{content}}</div>',
    'inputContainerError' => '<div class="item form-group">{{content}}{{error}}</div>',
    'checkContainer' => ''
]);
?>
<div class="col-md-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Sửa Phòng Khách sạn</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>
            <?php
            echo $this->Form->control('name', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Tiêu đề *',
                'required' => 'required'
            ]);
            echo $this->Form->control('area', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Diện tích (m2) *',
            ]);
            echo $this->Form->control('num_bed', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Số giường *',
            ]);
            echo $this->Form->control('num_adult', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Số người lớn *',
                'required' => 'required'
            ]);
            echo $this->Form->control('num_children', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Số trẻ em',
                'required' => 'required'
            ]);
            echo $this->Form->control('max_adult', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Số người lớn tối đa *',
                'required' => 'required'
            ]);
            echo $this->Form->control('standard_child_age', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Tuổi trẻ em tiêu chuẩn *',
                'required' => 'required'
            ]);
            echo $this->Form->control('max_people', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Số người tối đa *',
                'required' => 'required'
            ]);
            echo $this->Form->control('view_type', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Hướng nhìn *',
                'required' => 'required'
            ]);
            ?>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Có bữa sáng</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="radio">
                        <label>
                            <input type="checkbox" class="flat" name="have_breakfast" <?= $room->have_breakfast == 1 ? 'checked' : '' ?> value="1">
                        </label>
                    </div>
                </div>
            </div>
            <div id="dropzone-upload" class="dropzone">
            </div>
            <input type="hidden" name="media" value='<?= $room->media ?>'/>
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
<?= $this->Form->end() ?>
