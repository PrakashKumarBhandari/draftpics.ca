<?php defined( 'ABSPATH' ) or die;
/* @var WhizzyFormField $field */
/* @var WhizzyForm $form */
/* @var mixed $default */
/* @var string $name */
/* @var string $idname */
/* @var string $label */
/* @var string $desc */
/* @var string $rendering */
/* @var string $show_on */

?>
<div class="group">
	<?php foreach ( $field->getmeta( 'options', array() ) as $fieldname => $fieldconfig ):
		$field = $form->field( $fieldname, $fieldconfig );
		// we set the fields to default to inline
		$field->ensuremeta( 'rendering', 'blocks' );
		// export field meta for processing
		$fielddesc = $field->getmeta( 'desc', null );
		$fieldexample = $field->getmeta( 'group-example', null );
		$fieldnote = $field->getmeta( 'group-note', null ); ?>
        <div class="field" <?php if ( $fieldconfig['type'] == 'group' ) { echo 'id="' . esc_attr( $fieldname ) . '"'; } ?> >
			<?php echo $field->render();
			if ( ! empty( $fieldnote ) ): ?>
                <span class="field-note"><?php echo esc_html( $fieldnote ); ?></span>
			<?php endif; ?>
        </div>
	<?php endforeach; ?>
</div>