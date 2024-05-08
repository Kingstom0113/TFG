import React from 'react';

const Plato = ({ plato }) => {
  return (
    <div className="plato-item">
      <h4>{plato.nombre}</h4>
      <p>{plato.descripcion}</p>
      <p>Precio: {plato.precio}€</p>
      <div className="dots"></div>
    </div>
  );
};

export default Plato;

