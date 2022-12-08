<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chỉnh sửa Partner</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>
            <?= $this->Form->create($user, ['class' => 'form-horizontal form-label-left', 'data-parsley-validate']) ?>
            <?php
            $this->Form->setTemplates([
                'formStart' => '<form class="" {{attrs}}>',
                'label' => '<label class="control-label col-md-3 col-sm-3 col-xs-12" {{attrs}}>{{text}}</label>',
                'input' => '<div class="col-md-6 col-sm-6 col-xs-12"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
                'select' => '<div class="col-md-6 col-sm-6 col-xs-12"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
                'inputContainer' => '<div class="item form-group">{{content}}</div>',
                'inputContainerError' => '<div class="item form-group">{{content}}{{error}}</div>',
                'checkContainer' => ''
            ]);
            echo $this->Form->control('hotel_id', [
                'empty' => 'Chọn khách sạn',
                'type' => 'select',
                'options' => $hotels,
                'class' => 'form-control',
                'required' => 'required',
                'label' => 'Khách Sạn *'
            ]);
            ?>
            <?php
            echo $this->Form->input('username', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Username *',
                'required' => 'required'
            ]);
            echo $this->Form->input('screen_name', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Tên hiển thị *',
                'required' => 'required'
            ]);
            ?>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích hoạt Partner</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="radio">
                        <label>
                            <input type="checkbox" class="flat" <?= ($user->is_active == 1) ? 'checked' : '' ?>
                                   name="is_active" value="1">
                        </label>
                    </div>
                </div>
            </div>
            <?php
            echo $this->Form->input('email', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Email *',
                'required' => 'required'
            ]);
            echo $this->Form->input('email_access_code', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Email access code *',
            ]);
            echo $this->Form->input('fbid', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Link facebook *',
                'required' => 'required'
            ]);
            echo $this->Form->input('zalo', [
                'type' => 'text',
                'class' => 'form-control',
                'label' => 'Zalo *',
                'required' => 'required'
            ]);
            ?>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>