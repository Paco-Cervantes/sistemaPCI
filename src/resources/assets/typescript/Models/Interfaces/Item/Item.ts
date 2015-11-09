/// <reference path="ItemType.ts"/>

module Models.Interfaces
{
    import ItemType = Models.Interfaces.ItemType;

    export interface Item
    {
        id: boolean;
        desc: string;
        quantity: number;
        stock_type_id: number;
        type: ItemType
    }
}