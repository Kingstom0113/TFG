import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';

const PlatoCreator = () => {
    const { cartaId } = useParams();  // Obtener cartaId de la URL
    const [plato, setPlato] = useState({
        nombre: '',
        descripcion: '',
        precio: '',
        carta_id: '', 
    });

    useEffect(() => {
        // Asegurarse de que el carta_id se establece cuando el componente se monta
        if (cartaId) {
            setPlato(prev => ({ ...prev, carta_id: cartaId }));
        }
    }, [cartaId]);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setPlato({ ...plato, [name]: value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        const response = await fetch('/api/platos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(plato)
        });

        if (!response.ok) {
            const errorData = await response.json();
            console.error('Error al crear el plato:', errorData.message);
            alert(`Error: ${errorData.message}`);
        } else {
            alert('Plato creado correctamente');
            window.location.reload();  // Recarga la página
        }
    };

    return (
        <form onSubmit={handleSubmit} className="form-container">
            <div style={{ display: 'flex', flexDirection: 'row', justifyContent: 'space-between', gap: '2rem', alignItems: 'center' }}>
                <div style={{ display: 'flex', flexDirection: 'column', gap: '10px' }}>
                    <label htmlFor="nombre">Nombre del plato:</label>
                    <input type="text" id="nombre" name="nombre" value={plato.nombre} onChange={handleChange} placeholder="Nombre del plato" required />
                    <label htmlFor="descripcion">Descripción del plato:</label>
                    <textarea id="descripcion" name="descripcion" value={plato.descripcion} onChange={handleChange} placeholder="Descripción del plato" required></textarea>
                    <label htmlFor="precio">Precio:</label>
                    <input type="text" id="precio" name="precio" value={plato.precio} onChange={handleChange} placeholder="Precio" required />
                </div>
            </div>
            <button type="submit">Crear Plato</button>
        </form>
    );
};

export default PlatoCreator;


