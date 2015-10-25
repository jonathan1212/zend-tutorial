<?php
/**
 * Account
 *
 * @ORM\Table(name="account", indexes={@ORM\Index(name="IDX_7D3656A4C6798DB", columns={"account_type_id"})})
 * @ORM\Entity(repositoryClass="Application\Repository\Account")
 * @Annotation\Name("account")
 */
class Account extends EntityAbstract implements InputFilterAwareInterface, UserInterface
{
    /**
     * @var Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"input" = "hidden"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="account_id_seq", allocationSize=1, initialValue=1)
     * @Annotation\Attributes({"type":"hidden"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", nullable=false, unique=true, options={"input" = "text"})
     * @Annotation\Attributes({"type":"text", "class":"test"})
     * @Annotation\Options({"label":"Code"})
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", nullable=false, options={"input" = "password"})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Mot de passe"})
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="password_key", type="string", nullable=false, options={"input" = "password"})
     * @Annotation\Exclude()
     */
    protected $passwordKey;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"input" = "checkbox"})
     * @Annotation\Attributes({"type":"checkbox"})
     * @Annotation\Options({"label":"Actif"})
     */
    protected $active = false;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false, options={"input" = "checkbox"})
     * @Annotation\Attributes({"type":"checkbox"})
     * @Annotation\Options({"label":"Visible"})
     */
    protected $visible = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false, options={"input" = "date"})
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"Date de début"})
     */
    protected $startDate = 'now()';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=true, options={"input" = "date"})
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"Date de fin"})
     */
    protected $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", nullable=false, options={"input" = "password"})
     * @Annotation\Exclude()
     */
    protected $token;

    /**
     * @var integer
     *
     * @ORM\Column(name="expires", type="integer", nullable=true)
     * @Annotation\Exclude()
     */
    protected $expires;

    /**
     * @var \Application\Entity\AccountType
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\AccountType", fetch="EAGER", inversedBy="accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_type_id", referencedColumnName="id", nullable=false)
     * })
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Type de compte", "object_manager":"Doctrine\Common\Persistence\ObjectManager" ,"target_class":"Application\Entity\AccountType"})
     */
    protected $accountType;

    ...
