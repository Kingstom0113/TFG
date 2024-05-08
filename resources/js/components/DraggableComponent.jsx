import React from 'react';
import { useDrag } from 'react-dnd';

const DraggableComponent = ({ id, children }) => {
    const [{ isDragging }, drag] = useDrag(() => ({
        type: 'BOX',
        item: { id },
        collect: (monitor) => ({
            isDragging: !!monitor.isDragging(),
        }),
    }));

    return (
        <div ref={drag} style={{ opacity: isDragging ? 0.5 : 1 }}>
            {children}
        </div>
    );
};

export default DraggableComponent;
