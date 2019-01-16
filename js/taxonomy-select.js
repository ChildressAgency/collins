/**
 * External dependencies
 */
const { groupBy }           = lodash;
const { select }                = wp.data;
const { TreeSelect }         = wp.components;

/**
 * TaxonomySelect
 *
 * A poor man's wp_dropdown_categories() as a component, for use in
 * <InspectorControls />
 *
 */
export default function TaxonomySelect( { taxonomy, hierarchical, hide_empty, label, noOptionLabel, selectedId, onChange } ) {
    taxonomy = taxonomy || 'category';
    hierarchical = hierarchical || false;
    const args = {
        hide_empty: hide_empty || false,
    };
    const { getEntityRecords } = select( 'core' );
    const termsList = getEntityRecords( 'taxonomy', taxonomy, args );

    const termsTree = hierarchical ? buildTermsTree( termsList ) : termsList;

    /**
     * Returns terms in a tree form.
     *
     * Note: borrowed from QueryControls.
     *
     * @param {Array} flatTerms  Array of terms in flat format.
     *
     * @return {Array} Array of terms in tree format.
     */
    function buildTermsTree( flatTerms ) {
        const termsByParent = groupBy( flatTerms, 'parent' );
        const fillWithChildren = ( terms ) => {
            return terms.map( ( term ) => {
                const children = termsByParent[ term.id ];

                return {
                    ...term,
                    children: children && children.length ? fillWithChildren( children ) : [],
                };
            } );
        };

        return fillWithChildren( termsByParent[ '0' ] || [] );
    }

    return (
            <TreeSelect
                { ...{ label, noOptionLabel, onChange } }
                tree={ termsTree }
                selectedId={ selectedId }
            />
    );
}