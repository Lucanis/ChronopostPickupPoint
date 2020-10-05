<?php

namespace ChronopostPickupPoint\Model\Base;

use \Exception;
use \PDO;
use ChronopostPickupPoint\Model\ChronopostPickupPointOrderAddress as ChildChronopostPickupPointOrderAddress;
use ChronopostPickupPoint\Model\ChronopostPickupPointOrderAddressQuery as ChildChronopostPickupPointOrderAddressQuery;
use ChronopostPickupPoint\Model\Map\ChronopostPickupPointOrderAddressTableMap;
use ChronopostPickupPoint\Model\Thelia\Model\Country;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'chronopost_pickup_point_order_address' table.
 *
 *
 *
 * @method     ChildChronopostPickupPointOrderAddressQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildChronopostPickupPointOrderAddressQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildChronopostPickupPointOrderAddressQuery orderByAddress1($order = Criteria::ASC) Order by the Address1 column
 * @method     ChildChronopostPickupPointOrderAddressQuery orderByAddress2($order = Criteria::ASC) Order by the Address2 column
 * @method     ChildChronopostPickupPointOrderAddressQuery orderByAddress3($order = Criteria::ASC) Order by the Address3 column
 * @method     ChildChronopostPickupPointOrderAddressQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method     ChildChronopostPickupPointOrderAddressQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildChronopostPickupPointOrderAddressQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 *
 * @method     ChildChronopostPickupPointOrderAddressQuery groupById() Group by the id column
 * @method     ChildChronopostPickupPointOrderAddressQuery groupByCompany() Group by the company column
 * @method     ChildChronopostPickupPointOrderAddressQuery groupByAddress1() Group by the Address1 column
 * @method     ChildChronopostPickupPointOrderAddressQuery groupByAddress2() Group by the Address2 column
 * @method     ChildChronopostPickupPointOrderAddressQuery groupByAddress3() Group by the Address3 column
 * @method     ChildChronopostPickupPointOrderAddressQuery groupByZipCode() Group by the zip_code column
 * @method     ChildChronopostPickupPointOrderAddressQuery groupByCity() Group by the city column
 * @method     ChildChronopostPickupPointOrderAddressQuery groupByCountryId() Group by the country_id column
 *
 * @method     ChildChronopostPickupPointOrderAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChronopostPickupPointOrderAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChronopostPickupPointOrderAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChronopostPickupPointOrderAddressQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method     ChildChronopostPickupPointOrderAddressQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method     ChildChronopostPickupPointOrderAddressQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method     ChildChronopostPickupPointOrderAddress findOne(ConnectionInterface $con = null) Return the first ChildChronopostPickupPointOrderAddress matching the query
 * @method     ChildChronopostPickupPointOrderAddress findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChronopostPickupPointOrderAddress matching the query, or a new ChildChronopostPickupPointOrderAddress object populated from the query conditions when no match is found
 *
 * @method     ChildChronopostPickupPointOrderAddress findOneById(int $id) Return the first ChildChronopostPickupPointOrderAddress filtered by the id column
 * @method     ChildChronopostPickupPointOrderAddress findOneByCompany(string $company) Return the first ChildChronopostPickupPointOrderAddress filtered by the company column
 * @method     ChildChronopostPickupPointOrderAddress findOneByAddress1(string $Address1) Return the first ChildChronopostPickupPointOrderAddress filtered by the Address1 column
 * @method     ChildChronopostPickupPointOrderAddress findOneByAddress2(string $Address2) Return the first ChildChronopostPickupPointOrderAddress filtered by the Address2 column
 * @method     ChildChronopostPickupPointOrderAddress findOneByAddress3(string $Address3) Return the first ChildChronopostPickupPointOrderAddress filtered by the Address3 column
 * @method     ChildChronopostPickupPointOrderAddress findOneByZipCode(string $zip_code) Return the first ChildChronopostPickupPointOrderAddress filtered by the zip_code column
 * @method     ChildChronopostPickupPointOrderAddress findOneByCity(string $city) Return the first ChildChronopostPickupPointOrderAddress filtered by the city column
 * @method     ChildChronopostPickupPointOrderAddress findOneByCountryId(int $country_id) Return the first ChildChronopostPickupPointOrderAddress filtered by the country_id column
 *
 * @method     array findById(int $id) Return ChildChronopostPickupPointOrderAddress objects filtered by the id column
 * @method     array findByCompany(string $company) Return ChildChronopostPickupPointOrderAddress objects filtered by the company column
 * @method     array findByAddress1(string $Address1) Return ChildChronopostPickupPointOrderAddress objects filtered by the Address1 column
 * @method     array findByAddress2(string $Address2) Return ChildChronopostPickupPointOrderAddress objects filtered by the Address2 column
 * @method     array findByAddress3(string $Address3) Return ChildChronopostPickupPointOrderAddress objects filtered by the Address3 column
 * @method     array findByZipCode(string $zip_code) Return ChildChronopostPickupPointOrderAddress objects filtered by the zip_code column
 * @method     array findByCity(string $city) Return ChildChronopostPickupPointOrderAddress objects filtered by the city column
 * @method     array findByCountryId(int $country_id) Return ChildChronopostPickupPointOrderAddress objects filtered by the country_id column
 *
 */
abstract class ChronopostPickupPointOrderAddressQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \ChronopostPickupPoint\Model\Base\ChronopostPickupPointOrderAddressQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\ChronopostPickupPoint\\Model\\ChronopostPickupPointOrderAddress', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChronopostPickupPointOrderAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChronopostPickupPointOrderAddressQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \ChronopostPickupPoint\Model\ChronopostPickupPointOrderAddressQuery) {
            return $criteria;
        }
        $query = new \ChronopostPickupPoint\Model\ChronopostPickupPointOrderAddressQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildChronopostPickupPointOrderAddress|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChronopostPickupPointOrderAddressTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChronopostPickupPointOrderAddressTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildChronopostPickupPointOrderAddress A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, COMPANY, ADDRESS1, ADDRESS2, ADDRESS3, ZIP_CODE, CITY, COUNTRY_ID FROM chronopost_pickup_point_order_address WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildChronopostPickupPointOrderAddress();
            $obj->hydrate($row);
            ChronopostPickupPointOrderAddressTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildChronopostPickupPointOrderAddress|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%'); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $company)) {
                $company = str_replace('*', '%', $company);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the Address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE Address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%'); // WHERE Address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address1)) {
                $address1 = str_replace('*', '%', $address1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the Address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE Address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%'); // WHERE Address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address2)) {
                $address2 = str_replace('*', '%', $address2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the Address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE Address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%'); // WHERE Address3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address3)) {
                $address3 = str_replace('*', '%', $address3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ADDRESS3, $address3, $comparison);
    }

    /**
     * Filter the query on the zip_code column
     *
     * Example usage:
     * <code>
     * $query->filterByZipCode('fooValue');   // WHERE zip_code = 'fooValue'
     * $query->filterByZipCode('%fooValue%'); // WHERE zip_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByZipCode($zipCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipCode)) {
                $zipCode = str_replace('*', '%', $zipCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ZIP_CODE, $zipCode, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::CITY, $city, $comparison);
    }

    /**
     * Filter the query on the country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryId(1234); // WHERE country_id = 1234
     * $query->filterByCountryId(array(12, 34)); // WHERE country_id IN (12, 34)
     * $query->filterByCountryId(array('min' => 12)); // WHERE country_id > 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $countryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::COUNTRY_ID, $countryId, $comparison);
    }

    /**
     * Filter the query by a related \ChronopostPickupPoint\Model\Thelia\Model\Country object
     *
     * @param \ChronopostPickupPoint\Model\Thelia\Model\Country|ObjectCollection $country The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function filterByCountry($country, $comparison = null)
    {
        if ($country instanceof \ChronopostPickupPoint\Model\Thelia\Model\Country) {
            return $this
                ->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::COUNTRY_ID, $country->getId(), $comparison);
        } elseif ($country instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::COUNTRY_ID, $country->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type \ChronopostPickupPoint\Model\Thelia\Model\Country or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation Country object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ChronopostPickupPoint\Model\Thelia\Model\CountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', '\ChronopostPickupPoint\Model\Thelia\Model\CountryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChronopostPickupPointOrderAddress $chronopostPickupPointOrderAddress Object to remove from the list of results
     *
     * @return ChildChronopostPickupPointOrderAddressQuery The current query, for fluid interface
     */
    public function prune($chronopostPickupPointOrderAddress = null)
    {
        if ($chronopostPickupPointOrderAddress) {
            $this->addUsingAlias(ChronopostPickupPointOrderAddressTableMap::ID, $chronopostPickupPointOrderAddress->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the chronopost_pickup_point_order_address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChronopostPickupPointOrderAddressTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChronopostPickupPointOrderAddressTableMap::clearInstancePool();
            ChronopostPickupPointOrderAddressTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildChronopostPickupPointOrderAddress or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildChronopostPickupPointOrderAddress object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChronopostPickupPointOrderAddressTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChronopostPickupPointOrderAddressTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        ChronopostPickupPointOrderAddressTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChronopostPickupPointOrderAddressTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // ChronopostPickupPointOrderAddressQuery
