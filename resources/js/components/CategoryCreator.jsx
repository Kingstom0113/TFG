import React, { useState } from 'react';

const CategoryCreator = () => {
    const [name, setName] = useState('');

    const handleChange = (event) => {
        setName(event.target.value);
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        const response = await fetch('/api/categories', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name })
        });

        if (response.ok) {
            alert('Categoría creada con éxito');
            window.location.reload();  // Recarga la página
        } else {
            const errorData = await response.json();
            alert('Error al crear categoría: ' + errorData.message);
        }
    };

    return (
        <form onSubmit={handleSubmit} className="form-container">
            <div style={{ display: 'flex', flexDirection: 'row', justifyContent: 'space-between', gap: '2rem', alignItems: 'center' }}>
                <div style={{ display: 'flex', flexDirection: 'column', gap: '10px' }}>
                    <label htmlFor="name">Nombre de la Categoría:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value={name}
                        onChange={handleChange}
                        placeholder="Introduce el nombre de la categoría"
                        required
                    />
                </div>
            </div>
            <button type="submit">Crear Categoría</button>
        </form>
    );
};

export default CategoryCreator;

