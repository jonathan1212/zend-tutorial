// File: upload-form.phtml
<?php $form->prepare(); // The correct enctype is set here ?>
<?php echo $this->form()->openTag($form); ?>

<div class="form-element">
    <?php $fileElement = $form->get('image-file'); ?>
    <?php echo $this->formLabel($fileElement); ?>
    <?php echo $this->formFile($fileElement); ?>
    <?php echo $this->formElementErrors($fileElement); ?>
</div>

<button>Submit</button>

<?php echo $this->form()->closeTag(); ?>