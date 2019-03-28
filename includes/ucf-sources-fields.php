<?php
/**
 * Responsible for additional taxonomy meta
 **/
if ( ! class_exists( 'UCF_Sources_Fields' ) ) {
	class UCF_Sources_Fields {
		/**
		 * Registers meta fields related to sources
		 * @author RJ Bruneel
		 * @since 1.0.0
		 **/
		public static function register_meta_fields() {
			add_action( 'sources_add_form_fields', array( 'UCF_Sources_Fields', 'add_fields' ), 10, 1 );
			add_action( 'sources_edit_form_fields', array( 'UCF_Sources_Fields', 'edit_fields' ), 10, 2 );
			add_action( 'created_sources', array( 'UCF_Sources_Fields', 'save_sources_meta' ), 10, 2 );
			add_action( 'edited_sources', array( 'UCF_Sources_Fields', 'edited_sources_meta' ), 10, 2 );
		}

		/**
		 * Adds meta fields for sources
		 * @author RJ Bruneel
		 * @since 1.0.0
		 * @param $taxonomy WP_Taxonomy | The taxonomy object
		 **/
		public static function add_fields( $taxonomy ) {
		?>
			<div class="form-field term-group">
				<label for="sources_alias"><?php _e( 'Department Alias', 'ucf_sources' ); ?></label>
				<input type="text" id="sources_alias" name="sources_alias">
			</div>
		<?php
		}

		/**
		 * Adds meta fields for sources in the edit screen
		 * @author RJ Bruneel
		 * @since 1.0.0
		 * @param $term WP_Term | The term object
		 * @param $taxonomy WP_Taxonomy | The taxonomy object
		 **/
		public static function edit_fields( $term, $taxonomy ) {
			$alias = get_term_meta( $term->term_id, 'sources_alias', true );

		?>
			<tr class="form-field term-group-wrap">
				<th scope="row"><label for="sources_alias"><?php _e( 'Department Alias', 'ucf_sources' ); ?></label></th>
				<td><input type="text" id="sources_alias" name="sources_alias" value="<?php echo $alias; ?>"></td>
			</tr>
		<?php
		}

		/**
		 * Saves sources meta data
		 * @author RJ Bruneel
		 * @since 1.0.0
		 * @param $term_id int | The term id
		 * @param $tt_id int | The taxonomy term id
		 **/
		public static function save_sources_meta( $term_id, $tt_id ) {
			if ( isset( $_POST['sources_alias'] ) && '' !== $_POST['sources_alias'] ) {
				$alias = sanitize_text_field( $_POST['sources_alias'] );
				add_term_meta( $term_id, 'sources_alias', $alias, true );
			}
		}

		/**
		 * Saved sources meta data on edit
		 * @author RJ Bruneel
		 * @since 1.0.0
		 * @param $term_id int | The term id
		 * @param $tt_id int | The taxonomy term id
		 **/
		public static function edited_sources_meta( $term_id, $tt_id ) {
			if ( isset( $_POST['sources_alias'] ) && '' !== $_POST['sources_alias'] ) {
				$alias = sanitize_text_field( $_POST['sources_alias'] );
				update_term_meta( $term_id, 'sources_alias', $alias );
			}
		}
	}
}
