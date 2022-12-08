<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
echo $this->Html->script('/backend/libs/jquery-ui/jquery-ui.min', ['block' => 'scriptBottom']);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ngày hết hạn hợp đồng của khách sạn </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <?= $this->Form->create($config, ['class' => 'form-horizontal form-label-left', 'data-parsley-validate', 'type' => 'file']) ?>
            <?php
            $this->Form->setTemplates([
                'formStart' => '<form class="" {{attrs}}>',
                'label' => '<label class="control-label col-md-3 col-sm-3 col-xs-12" {{attrs}}>{{text}}</label>',
                'input' => '<div class="col-md-6 col-sm-6 col-xs-12"><input type="{{type}}" name="{{name}}" {{attrs}} value="{{value}}" /></div>',
                'select' => '<div class="col-md-6 col-sm-6 col-xs-12"><select name="{{name}}" {{attrs}}>{{content}}</select></div>',
                'textarea' => '<div class="col-md-6 col-sm-6 col-xs-12"><textarea name="{{name}}" {{attrs}}>{{content}}{{value}}</textarea></div>',
                'inputContainer' => '<div class="item form-group">{{content}}</div>',
                'inputContainerError' => '<div class="item form-group">{{content}}{{error}}</div>',
                'checkContainer' => ''
            ]);
            if (isset($config)){
                echo $this->Form->control('value', [
                    'type' => 'number',
                    'class' => 'form-control tinymce',
                    'label' => 'Ngày hết hạn (vd: 90) *',
                    'required' => 'required',
                    'default' => $config->value
                ]);
            }
            else {
                echo $this->Form->control('value', [
                    'type' => 'number',
                    'class' => 'form-control tinymce',
                    'label' => 'Ngày hết hạn (vd: 90) *',
                    'required' => 'required',
                    'default' => 0
                ]);
            }
            ?>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>