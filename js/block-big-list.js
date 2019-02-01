registerBlockType( 'childress/big-list', {
    title: 'Big List',
    icon: 'list-view',
    category: 'custom-blocks',

    edit( { attributes, className, setAttributes } ) {
        return (
            <div className={ className }>
                <InnerBlocks
                    allowedBlocks={['core/list']}
                    template={[['core/list']]}
                    templateLock="all"
                    />
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div className="wp-block-childress-big-list">
                <InnerBlocks.Content />
            </div>
        );
    },
} );