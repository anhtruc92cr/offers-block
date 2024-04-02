import { useBlockProps } from '@wordpress/block-editor';

export default function Save( { attributes } ) {
    const { apiUrl } = attributes;

    return (
        <p { ...useBlockProps.save() }>
            API URL: { apiUrl }
        </p>
    );
}