registerBlockType( 'childress/sub-nav', {
    title: 'Navigation',
    icon: 'editor-contract',
    category: 'custom-blocks',

    edit( { attributes, className, setAttributes } ) {
        return (
            <div className={ className }>
                <p style={{ textAlign: 'center' }}>About Us Menu</p>
            </div>
        );
    },

    save( { attributes } ) {
        return null;
    },
} );