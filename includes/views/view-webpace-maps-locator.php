<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/31/2016
 * Time: 7:43 PM
 */

/**
 * Class Webpace_Maps_Direction
 */
interface Webpace_Maps_Locator_Interface {
	/**
	 * @return int
	 */
	public function get_id();

	/**
	 * @return int
	 */
	public function get_map_id();

	/**
	 * @param int $map_id
	 *
	 * @return Webpace_Maps_Direction
	 * @throws Exception
	 */
	public function set_map_id( $map_id );

	/**
	 * @return string
	 */
	public function get_name();

	/**
	 * @param string $name
	 *
	 * @return Webpace_Maps_Direction
	 */
	public function set_name( $name );

	/**
	 * @return float
	 */
	public function get_locator_lat();

	/**
	 * @param float $locator_lat
	 *
	 * @return Webpace_Maps_Locator
	 */
	public function set_locator_lat( $locator_lat );

	/**
	 * @return float
	 */
	public function get_locator_lng();

	/**
	 * @param float $locator_lng
	 *
	 * @return Webpace_Maps_Locator
	 */
	public function set_locator_lng( $locator_lng );

    /**
     * @return string
     */
    public function get_locator_addr();

    /**
     * @param float $locator_addr
     *
     * @return Webpace_Maps_Locator
     */
    public function set_locator_addr( $locator_addr );

    /**
     * @return string
     */
    public function get_locator_phone();

    /**
     * @param string $locator_phone
     *
     * @return Webpace_Maps_Locator
     */
    public function set_locator_phone($locator_phone);

    /**
     * @return string
     */
    public function get_locator_days();

    /**
     * @param string $locator_days
     *
     * @return Webpace_Maps_Locator
     */
    public function set_locator_days($locator_days);


}