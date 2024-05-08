import React from 'react';

const CategoryItem = ({ category }) => {
    return (
        <div className="plato-item">
            <h4>{category.name}</h4>
            <div className='dots'></div>
        </div>
    );
};

export default CategoryItem;
