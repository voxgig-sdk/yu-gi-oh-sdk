import { YuGiOhEntityBase } from '../YuGiOhEntityBase';
import type { YuGiOhSDK } from '../YuGiOhSDK';
import type { Control } from '../types';
import type { Cardinfo, CardinfoListMatch } from '../YuGiOhTypes';
declare class CardinfoEntity extends YuGiOhEntityBase<Cardinfo> {
    constructor(client: YuGiOhSDK, entopts: any);
    make(this: CardinfoEntity): CardinfoEntity;
    list(this: any, reqmatch?: CardinfoListMatch, ctrl?: Control): Promise<CardinfoEntity[]>;
}
export { CardinfoEntity };
