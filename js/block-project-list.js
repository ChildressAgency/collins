registerBlockType( 'childress/project-list', {
    title: 'Project List',
    icon: 'list-view',
    category: 'custom-blocks',

    attributes: {
        category: {
            type: 'string',
            default: '"residential", "commercial", "public-infrastructure"'
        },
    },

    edit( { attributes, className, setAttributes } ){
        const { category } = attributes;

        return (
            <Fragment>
                <InspectorControls>
                    <PanelBody
                        title={ 'Projects Options' }
                        initialOpen={ true }>
                        <SelectControl
                            label="Category"
                            value={ category ? category : '"residential", "commercial", "public-infrastructure"' }
                            options={[
                                {
                                    label: 'All',
                                    value: '"residential", "commercial", "public-infrastructure"'
                                },
                                {
                                    label: 'Residential',
                                    value: 'residential'
                                },
                                {
                                    label: 'Commercial',
                                    value: 'commercial'
                                },
                                {
                                    label: 'Public & Infrastructure',
                                    value: 'public-infrastructure'
                                }
                            ]}
                            onChange={ ( value ) => setAttributes({ category: value }) }
                        />
                    </PanelBody>
                </InspectorControls>
                <ServerSideRender
                    block='childress/project-list'
                />
            </Fragment>
        );
    },

    save( { attributes } ) {
        const { category } = attributes;

        // Rendering in PHP
        return null;
    },
} );